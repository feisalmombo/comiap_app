import React from 'react'
import { addQuestions, attachQuestionsToQuestionnaires, updateQuestionnaires, updateQuestions } from '../../api'

const QuestionForm = ({ 
    question, 
    setQuestion, 
    questions, 
    setQuestions, editMode, setEditMode, questionnaires, setQuestionnaires, activeQuestionnaire, setActiveQuestionnaire }) => {

    const handleChange = (name, value = null) => {
        if (name == "name") {
            setQuestion({ ...question, name: value })
        }

        if (name == "multiple_choices") {
            setQuestion({ ...question, multiple_choices: !question.multiple_choices })
        }

        if (name == "multiple_choices_per_group") {
            setQuestion({ ...question, multiple_choices_per_group: !question.multiple_choices_per_group })
        }
    }

    const handleClick = (button, data) => {
        if (button == "add") {
            if (question.name) {
                if (!questions.data.includes(question)) {
                    setQuestions({ ...questions, isLoading: true })
                    addQuestions(question).then(res => {
                        setQuestions({ ...questions, data: [...questions.data, res], isLoading: false })
                        setQuestion({ name: "", multiple_choices: false, multiple_choices_per_group: false })

                        //Attach Question to Active Questionnaire
                        attachQuestionsToQuestionnaires(activeQuestionnaire.id, {id: res.id}).then(res => {
                            var allQuestionnaires = questionnaires.data
                            var focused_questionnaire = allQuestionnaires.find(item => item.id == res.id)
                            var index = allQuestionnaires.indexOf(focused_questionnaire)
                            allQuestionnaires[index] = res
                            setQuestionnaires({ ...questionnaires, data: allQuestionnaires })
                            setActiveQuestionnaire(res)
                        })
                    })
                }
            }
        }

        if (button == "update") {
            if (question.name) {
                if (questions.data.includes(editMode)) {
                    let data = questions.data
                    let index = questions.data.indexOf(editMode)
                    updateQuestions(editMode.id, question).then(res => {
                        data[index] = res
                        setQuestions({ ...questions, data: data })
                        setQuestion({ name: "", multiple_choices: false, multiple_choices_per_group: false })
                        setEditMode(false)
                    }).catch(e => console.log(e))
                }
            }
        }
    }

    return (
        <div className="card my-2">
            <div className="card-body">
                <input type="text" onChange={(e) => handleChange("name", e.target.value)} className="form-control" placeholder="Name of the Question" value={question.name} />
                <div className="d-flex py-2">
                    <div className="d-flex align-items-baseline mr-2">
                        <input type="checkbox" onChange={() => handleChange("multiple_choices")} name="multiple_choices" id="" className="mr-1" checked={question.multiple_choices} /> Multiple Choices
                </div>
                    <div className="d-flex align-items-baseline">
                        <input type="checkbox" onChange={() => handleChange("multiple_choices_per_group")} name="multiple_choices_per_group" id="" className="mr-1" checked={question.multiple_choices_per_group} /> Multiple Choices Per Group
                    </div>
                    <button className={`btn ${editMode ? 'btn-info' : 'btn-success'} ml-auto`} onClick={() => editMode ? handleClick("update") : handleClick("add")}>{editMode ? "Edit" : "Add"} Question</button>
                </div>
            </div>
        </div>
    )
}

export default QuestionForm