import React, { Component } from 'react';
import {Provider} from 'react-redux'
import Routes from './routes/routes';
import {createBrowserHistory} from 'history'
import configureStore from './redux/store/configureStore';

const history = createBrowserHistory()

const {store, persistor} = configureStore(history)

class ReactApp extends Component {
  render() {
    return (
      <Provider store={store}>
        {/** <PersistGate loading={<Loading />} persistor={persistor}> */}
          <Routes history={history}/>
        {/**</PersistGate> */}
      </Provider>
    );
  }
}

export default ReactApp;