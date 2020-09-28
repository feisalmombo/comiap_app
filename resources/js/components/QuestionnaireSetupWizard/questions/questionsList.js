import React, { useEffect } from 'react'
import { attachQuestionsToQuestionnaires, detachQuestionsToQuestionnaires, deleteQuestions } from '../../api'

const QuestionsList = 
    ({ questions, 
        setQuestions,
        setQuestion, 
        showChoices, 
        setShowChoices, 
        setEditMode, 
        activeQuestionnaire, 
        setActiveQuestionnaire, 
        setQuestionnaires, 
        questionnaires,
        setActiveQuestion }) => {
    
    const handleChange = (item) => {
        const indexOfQuestionnaire = questionnaires.data.indexOf(activeQuestionnaire)
        var _questionnaires = questionnaires.data
        if (!questionnaires.data[indexOfQuestionnaire].questions.find(qn => qn.id == item.id)) {
            attachQuestionsToQuestionnaires(activeQuestionnaire.id, {id:item.id}).then(res => {
                _questionnaires[indexOfQuestionnaire] = res
                setQuestionnaires({...questionnaires, data: _questionnaires})
                setActiveQuestionnaire(res)
            })
        } else {
            detachQuestionsToQuestionnaires(activeQuestionnaire.id, {id:item.id}).then(res => {
                _questionnaires[indexOfQuestionnaire] = res
                setQuestionnaires({...questionnaires, data: _questionnaires})
                setActiveQuestionnaire(res)
            })
        }
    }

    const toggle = (question) => {
        if (showChoices) {
            if (showChoices == question) {
                setShowChoices(false)
            } else {
                setShowChoices(question)
            }
        } else {
            setShowChoices(question)
        }
    }

    const handleClick = (button, data) => {
        if (button == "edit") {
            if (data) {
                setEditMode(data)
                setQuestion(data)
            }
        }

        if (button == "assign") {
            if (data) {
                setActiveQuestion(data)
            }
        }

        if (button == "delete") {
            if (data) {
                deleteQuestions(data.id).then(res => {
                    var _data = questions.data
                    _data = _data.filter(qn => qn.id != data.id)
                    console.log("New DAta is" , _data)
                    setQuestions({...questions, data: _data})
                })
            }
        }
    }


    return (
        <div className="card">
            <div className="card-body">
                {questions.isLoading ? <p>Loading...</p> : null}
                {!questions.data.length ? "No Questions Currently" : (
                    <table className="table table-hovered table-border table-stripped">
                        <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Include</th>
                                <th>Question</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            {questions.data.map((item, index) => (
                                <React.Fragment>
                                    <tr>
                                        <td>{index + 1}</td>
                                        <td><input type="checkbox" onChange={() => handleChange(item)} name="" id="" checked={activeQuestionnaire && activeQuestionnaire.questions.find(qn => qn.id == item.id) ? true : false} /></td>
                                        <td>{item.name}</td>
                                        <td><button onClick={() => handleClick("assign", item)} className="btn btn-success">Assign</button> <button onClick={() => handleClick("edit", item)} className="btn btn-info">Edit</button> <button onClick={() => handleClick("delete",item)} className="btn btn-danger">Delete</button> <button onClick={() => toggle(item)} className="btn btn-link">Show Choices</button></td>
                                    </tr>

                                    <div style={{ display: showChoices == item ? "block" : "none" }}>
                                        <h5>Choices</h5>
                                        <p>Choice 1</p>
                                        <p>Choice 2</p>
                                    </div>
                                </React.Fragment>
                            ))}
                        </tbody>
                    </table>
                )}
            </div>
        </div>
    )
}

export default QuestionsList