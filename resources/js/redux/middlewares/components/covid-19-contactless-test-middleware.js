/* eslint-disable default-case */

export const covid19ContactlessTestMiddleware = ({getState, dispatch}) => next => action => {
    next(action)
}