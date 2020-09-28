import React, { useState } from 'react'
import { addGroups, updateGroups, deleteGroups } from '../api'

const Groups = ({ groups, setGroups }) => {
    
    const [group, setGroup] = useState("")
    const [editMode, setEditMode] = useState(false)

    const handleChange = (e) => {
        setGroup(e.target.value)
    }

    const handleClick = (button, data=null) => {
        if (button == "add") {
            addGroups({name: group}).then(res => {
                setGroups({...groups, data: [...groups.data, res]})
                setGroup("")
            })
        }

        if (button == "edit") {
            if (data) {
                setEditMode(data)
                setGroup(data.name)
            }
        }

        if (button == "update") {
            updateGroups(editMode.id, {name: group}).then(res => {
                let data = groups.data
                let index = data.indexOf(editMode)
                data[index] = res
                setGroups({...groups, data: data})
                setGroup("")
            })
        }

        if (button == "delete") {
            deleteGroups(data.id).then(res => {
                var _data = groups.data.filter(item => item.id != data.id)
                setGroups({...groups, data: _data})
            })
        }
    }

    return (
        <div className="card my-2">
            <div className="card-body">
                <h4 className="card-title">Groups</h4>
                {groups.isLoading ? <p>Loading...</p> : 
                    !groups.data.length ? <p>Please add a group</p> : (
                    <div className="d-flex flex-column">
                        {groups.data.map(item => <div className="d-flex py-1"><span className="mr-auto" onClick={() => handleClick("edit", item)}>{item.name}</span><button onClick={() => handleClick("delete", item)} className="btn btn-sm btn-danger">Delete</button></div>)}
                    </div>
                )}
                <div className="d-flex">
                    <input type="text" onChange={ handleChange } className="form-control" placeholder="group name" value={group}/>
                    <button onClick={() => editMode ? handleClick("update") : handleClick("add") } className={`btn btn-${editMode ? "info" : "success"} ml-1`}>{ editMode ? "Edit" : "Add"}</button>
                </div>
            </div>
        </div>
    )
}

export default Groups