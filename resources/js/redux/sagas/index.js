import { takeEvery, all, call, put, select } from 'redux-saga/effects'

function* rootSaga() {
    console.log("Root Saga Triggered")
}
export default rootSaga