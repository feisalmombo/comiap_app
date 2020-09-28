import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import Questionnaire from './questionnaire';
import axios from 'axios';
import api, { getQuestionnaires, getGroups } from '../api';
import { Choices } from './choices';
import Questions from './questions/index';
import Groups from './groups';

const QuestionnaireSetupWizard = () => {

    const [questionnaires, setQuestionnaires] = useState({
        isLoading: false,
        data: []
    })

    const [questions, setQuestions] = useState({
        isLoading: false,
        data: []
    })

    const [groups, setGroups] = useState({
        isLoading: false,
        data: []
    })

    const [activeQuestionnaire, setActiveQuestionnaire] = useState(false)
    const [activeQuestion, setActiveQuestion] = useState(false)
    const [hideManageQuestionnaires, setHideManageQuestionnaires] = useState(false)

    useEffect(() => {
        //Fetch Questionnaires
        loadQuestionnaires()
        loadGroups()
    }, [])

    const loadQuestionnaires = () => {
        if (!questionnaires.isLoading) {
            setQuestionnaires({ ...questionnaires, isLoading: true })
            getQuestionnaires().then(data => {
                setQuestionnaires({ ...questionnaires, isLoading: false, data: data })
            }).catch(e => setQuestionnaires({ ...questionnaires, isLoading: false }))
        }
    }

    const loadGroups = () => {
        if (!groups.isLoading) {
            setGroups({...groups, isLoading: true})
            getGroups().then(data => {
                setGroups({...groups, isLoading: false, data: data})
            }).catch(e => setGroups({...groups, isLoading: false}))
        }
    }

    return (
        <React.Fragment>
            <div className="row">
                <div className="col-md-3" style={{ display: hideManageQuestionnaires ? "none" : null }}>
                    <div className="card">
                        <div className="card-body">
                            <h4 className="card-title">Questionnaires</h4>
                            <Questionnaire
                                questionnaires={questionnaires}
                                setQuestionnaires={setQuestionnaires}
                                loadQuestionnaires={loadQuestionnaires} />
                        </div>
                    </div>
                </div>

                <div className="col">
                    {questionnaires.data.length
                        ? <Questions
                            hideManageQuestionnaires={hideManageQuestionnaires}
                            setHideManageQuestionnaires={setHideManageQuestionnaires}
                            activeQuestionnaire={activeQuestionnaire}
                            setActiveQuestionnaire={setActiveQuestionnaire}
                            questionnaires={questionnaires}
                            setQuestionnaires={setQuestionnaires}
                            questions={questions}
                            setQuestions={setQuestions}
                            setActiveQuestion={setActiveQuestion} />
                        : <p>There are no questionnaires.</p>}
                </div>


                <div className="col-md-3">
                    <Choices
                        questions={questions}
                        setQuestions={setQuestions}
                        groups={groups}
                        activeQuestion={activeQuestion} 
                        setActiveQuestion={setActiveQuestion}/>
                    
                    <Groups
                        groups={ groups } 
                        setGroups={ setGroups } />
                </div>
            </div>
        </React.Fragment>
    )
}

export default QuestionnaireSetupWizard;

if (document.getElementById('questionnaire_setup_wizard')) {
    ReactDOM.render(<QuestionnaireSetupWizard />, document.getElementById('questionnaire_setup_wizard'));
}
