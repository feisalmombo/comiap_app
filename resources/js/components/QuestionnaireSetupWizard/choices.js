import React, { useState } from 'react'
import { addChoices, updateChoices, deleteChoices } from '../api'

export const Choices = ({ activeQuestion, setActiveQuestion, groups, questions, setQuestions }) => {
    const [editMode, setEditMode] = useState(false)
    const [choice, setChoice] = useState({
        group_id: "",
        name: "",
        score: ""
    })

    const handleChange = (button, e) => {
        const value = e.target.value
        if (button == "group") {
            setChoice({...choice, group_id: value})
        }
        if (button == "name") {
            setChoice({...choice, name: value})
        }
        if (button == "score") {
            setChoice({...choice, score: value})
        }
    }

    const handleClick = (button, data) => {
        if (button == "add") {
            addChoices({question_id: activeQuestion.id, ...choice}).then(res => {
                var data = questions.data
                var index = data.indexOf(activeQuestion)
                data[index].choices.push(res)
                setQuestions({...questions, data: data})
                setActiveQuestion(data[index])
                setChoice({group_id: "", name: "", score: ""})
            })
        }
        if (button == "edit") {
            setEditMode(data)
            setChoice({...choice, group_id: data.group_id, name: data.name, score: data.score})
        }
        if (button == "update") {
            updateChoices(editMode.id, {question_id: activeQuestion.id, ...choice}).then(res => {
                var data = questions.data
                var index = data.indexOf(activeQuestion)
                var choiceIndex = data[index].choices.indexOf(editMode)
                data[index].choices[choiceIndex] = res
                setQuestions({...questions, data: data})
                setActiveQuestion(data[index])
                setChoice({group_id: "", name: "", score: ""})
                setEditMode(false)
            })
        }
        if (button == "delete") {
            deleteChoices(data.id).then(res => {
                var data = questions.data
                var index = data.indexOf(activeQuestion)
                var choices = data[index].choices.filter(choice => choice.id != data.id)
                data[index].choices = choices
                setQuestions({...questions, data: data})
                setActiveQuestion(data[index])
            })
        }
    }

    return (
        <div className="card">
            <div className="card-body">
                <h5>Assign Choices</h5>
                <p>{activeQuestion.name}</p>
                {!activeQuestion 
                    ? <p>Choose a Question</p> 
                    : !activeQuestion.choices.length 
                    ? <p>Add Choices</p> 
                    : (
                        <ol>
                            {activeQuestion.choices.map(choice => <li className="d-flex my-1"><span className="mr-auto" onClick={() => handleClick("edit", choice)}>{choice.name}</span><button className="btn btn-danger btn-sm" onClick={() => handleClick("delete", choice)}>x</button></li>)}
                        </ol>
                    )}
                <select className="form-control my-1" onChange={(e) => handleChange("group", e)}>
                    <option value="">Select Group</option>
                    { groups.data.map(group => <option value={group.id} selected={choice.group_id == group.id}>{group.name}</option>)}
                </select>
                <input type="text" className="form-control" placeholder="Choice Name" onChange={(e) => handleChange("name", e)} value={ choice.name} />
                <div className="d-flex py-1">
                    <input type="number" className="form-control mr-1" placeholder="Score" onChange={(e) => handleChange("score", e)} value={choice.score} />
                    <button className={`btn btn-${!editMode ? "success" : "info"}`} disabled={!choice.name ? true : false } onClick={() => !editMode ? handleClick("add") : handleClick("update")}>{!editMode ? "Add" : "Edit"}</button>
                </div>
            </div>
        </div>
    )
}