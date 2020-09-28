import {createStore, applyMiddleware} from 'redux'

import {composeWithDevTools} from 'redux-devtools-extension'

/** Redux Saga */
import createSagaMiddleware from 'redux-saga'
import rootSaga from '../sagas'

/**Router Middleware */
import {routerMiddleware} from 'connected-react-router'

/** My Reducers & Middlewares */
import rootReducer from '../reducers'
import { middleWare } from '../middlewares';

/** Redux Persist */
import { persistStore, persistReducer } from 'redux-persist'
import storage from 'redux-persist/lib/storage'

/** SAGA MIDDLEWARE */
const sagaMiddleware = createSagaMiddleware()

/** Redux Persist Config */
const persistConfig = {
    key: 'root',
    storage
}

const configureStore = (history) => {
    const persistedReducer = persistReducer(persistConfig, rootReducer(history))
    const store =  createStore(
        persistedReducer,
        composeWithDevTools(
            applyMiddleware(
                routerMiddleware(history), 
                sagaMiddleware,
                ...middleWare)
        )
    )
    sagaMiddleware.run(rootSaga)
    const persistor = persistStore(store)
    return { store, persistor }
}

export default  configureStore