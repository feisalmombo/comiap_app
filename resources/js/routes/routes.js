import React from 'react'
import { ConnectedRouter } from 'connected-react-router'
import { Switch, Route } from 'react-router'
import Covid19ContactlessTest from '../components/covid-19-contactless-test'
import TestSiteLocator from '../components/test-site-locator'

//Routes and Routing
const Routes = ({ history }) => {
        return (
            <ConnectedRouter history={history}>
                <Switch>
                    <Route path="/covidQ" component={Covid19ContactlessTest} />
                    <Route path="/sitelocator" component={TestSiteLocator} />
                    <Route>
                        <h3>No Matching Routes</h3>
                    </Route>
                </Switch>
            </ConnectedRouter>
        )

}

export default Routes