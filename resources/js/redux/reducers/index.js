import {combineReducers} from 'redux'

/**React Router Reducer */
import {connectRouter} from 'connected-react-router'

/**Redux Form Reducer */
import {reducer as formReducer} from 'redux-form'
import covid19ContactlessTestReducer from './components/covid-19-contactless-test-reducer'
import questionsReducer from './data/questions-reducer'
import sitesReducer from './data/sites-reducer'

const rootReducer = (history) => combineReducers({
    
    //third parties
    router: connectRouter(history),
    form: formReducer,

    //components
    covid19ContactlessTest: covid19ContactlessTestReducer,

    //data
    questions: questionsReducer,
    sites: sitesReducer,
})

export default rootReducer