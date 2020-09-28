import React, { useState, useEffect } from 'react'
import SelectQuestionnaire from './selectQuestionnaire'
import QuestionForm from './questionForm'
import QuestionsList from './questionsList'
import { getQuestions } from '../../api'

const Questions = ({ 
    activeQuestionnaire, 
    setActiveQuestionnaire, 
    questionnaires, 
    setQuestionnaires, 
    questions, 
    setQuestions, 
    hideManageQuestionnaires, 
    setHideManageQuestionnaires,
    setActiveQuestion }) => {

    const [question, setQuestion] = useState({
        name: "",
        multiple_choices: false,
        multiple_choices_per_group: false,
        choices: []
    })

    const [editMode, setEditMode] = useState(false)

    const [showChoices, setShowChoices] = useState(false)

    const handleChange = (data) => {

    }

    useEffect(() => {
        if (!activeQuestionnaire && questionnaires.data.length == 1) {
            setActiveQuestionnaire(questionnaires.data[0])
        }
        loadQuestions()
    }, [])

    const loadQuestions = () => {
        setQuestions({...questions, isLoading: true})
        getQuestions().then(res => setQuestions({...questions, data: res, isLoading: false}))
    }

    return (
        <React.Fragment>

            <SelectQuestionnaire
                hideManageQuestionnaires={hideManageQuestionnaires}
                setHideManageQuestionnaires={setHideManageQuestionnaires}
                activeQuestionnaire={activeQuestionnaire}
                setActiveQuestionnaire={setActiveQuestionnaire}
                questionnaires={questionnaires}
                handleChange={handleChange} />



            <QuestionForm
                question={question}
                setQuestion={setQuestion}
                questions={questions}
                setQuestions={setQuestions}
                editMode={editMode}
                setEditMode={setEditMode}
                questionnaires={ questionnaires } 
                setQuestionnaires={ setQuestionnaires } 
                activeQuestionnaire={ activeQuestionnaire } 
                setActiveQuestionnaire={ setActiveQuestionnaire } />

            <QuestionsList 
                setEditMode={ setEditMode }
                questions={ questions } 
                setQuestions={ setQuestions }
                setQuestion={ setQuestion }
                showChoices={ showChoices } 
                setShowChoices={ setShowChoices }
                activeQuestionnaire={ activeQuestionnaire }
                setActiveQuestionnaire={ setActiveQuestionnaire }
                questionnaires={ questionnaires }
                setQuestionnaires={ setQuestionnaires }
                setActiveQuestion={ setActiveQuestion }
                />
        </React.Fragment>
    )
}

export default Questions