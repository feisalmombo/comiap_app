import React, { useState } from 'react'
import loader from './loader.gif'
import { addQuestionnaires, updateQuestionnaires, deleteQuestionnaires } from '../api'

const Questionnaire = ({ questionnaires, setQuestionnaires }) => {
    const [editMode, setEditMode] = useState(false)
    const [questionnaire, setQuestionnaire] = useState({
        name: "",
        questions: []
    })

    const name = questionnaire.name

    const setName = (value) => {
        setQuestionnaire({ ...questionnaire, name: value })
    }

    const handleChange = (e) => {
        setName(e.target.value)
    }

    const handleClick = (button, data = null) => {
        if (button == "add") {
            if (name) {
                setQuestionnaires({ ...questionnaires, isLoading: true })
                addQuestionnaires({ name: name }).then(data => {
                    setQuestionnaires({ ...questionnaires, data: [...questionnaires.data, data], isLoading: false })
                    setName("")
                }).catch(e => {
                    console.log(e)
                    setQuestionnaires({ ...questionnaires, isLoading: false })
                })
            }
        }

        if (button == "del") {
            if (data) {
                deleteQuestionnaires(data.id).then(res => {
                    data = questionnaires.data.filter(item => item !== data)
                    setQuestionnaires({ ...questionnaires, data: data })
                }).catch(e => console.log(e))
            }
        }

        if (button == "list-item") {
            if (data) {
                setName(data.name)
                setEditMode(data)
            }
        }

        if (button == "edit") {
            if (data) {
                setQuestionnaires({ ...questionnaires, isLoading: true })
                updateQuestionnaires(editMode.id, data).then(res => {
                    data = questionnaires.data.map(item => item == editMode ? res : item)
                    setQuestionnaires({ ...questionnaires, data: data, isLoading: false })
                    setName("")
                    setEditMode(false)
                }).catch(e => {
                    setQuestionnaires({...questionnaires, isLoading: false})
                    console.log(e)
                })
            }
        }
    }



    return (
        <React.Fragment>
            <div className="d-flex">
                <input type="text" onChange={handleChange} className="form-control" placeholder="Questionnaire Name" value={name} />
                <button onClick={() => editMode ? handleClick("edit", questionnaire) : handleClick("add")} className={`btn ${editMode ? "btn-info" : "btn-success"} ml-1`}>{editMode ? 'Edit' : 'Add'}</button>
            </div>

            <div className="d-flex flex-column mt-2">
                {questionnaires.isLoading ? "loading..."
                    : !questionnaires.data.length
                        ? <p>No questionnaires</p>
                        : questionnaires.data.map(quest => (
                            <div className="d-flex my-2 hover">
                                <p className="mr-auto" onClick={() => handleClick("list-item", quest)}>{quest.name}</p>
                                <button onClick={() => handleClick("del", quest)} className="btn btn-danger btn-sm">Del</button>
                            </div>
                        ))}
            </div>
        </React.Fragment>
    )
}

export default Questionnaire
