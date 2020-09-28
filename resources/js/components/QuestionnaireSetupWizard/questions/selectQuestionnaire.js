import React from 'react'

const SelectQuestionnaire = ({ questionnaires, activeQuestionnaire, setActiveQuestionnaire, hideManageQuestionnaires, setHideManageQuestionnaires }) => {
    const selectQuestionnaire = (e) => {
        if (e.target.value) {
            setActiveQuestionnaire(questionnaires.data[e.target.value])
        }
    }
    return (
        <div className="card">
            <div className="card-body">
                <p>Select Questionnaire</p>
                <select onChange={ selectQuestionnaire } className="form-control">
                    {!activeQuestionnaire ? <option value="">Choose...</option> : null}
                    {questionnaires.data.map((item, index) => <option value={index}>{item.name}</option>)}
                </select>
                {!activeQuestionnaire.name ? null : (
                    <div className="py-2">
                        <div className="d-flex">
                            <p className="mr-2">Active Questionnaire: <mark>{activeQuestionnaire.name}</mark></p>
                            <p> No of Questions: <mark>{activeQuestionnaire.questions.length}</mark></p>
                        </div>
                        {hideManageQuestionnaires ? <button onClick={() => setHideManageQuestionnaires(false)} className="btn btn-primary btn-sm">Show Questionnaire Manager</button> : <button onClick={() => setHideManageQuestionnaires(true)} className="btn btn-success btn-sm">Hide Questionnaire Manager</button>}
                    </div>
                )}
            </div>
        </div>
    )
}

export default SelectQuestionnaire