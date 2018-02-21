import { combineReducers } from 'redux';

// import { reducer as dataReducer } from './data/reducer';

export const INIT_COMBAT = 'Combat/INIT_COMBAT';
export const ADD_TURN = 'Combat/ADD_TURN';

const initialState = {
    inited: false,
    turnCounter: 0
};

export const CombatReducer = (state = initialState, action) => {

    switch (action.type) {
        case INIT_COMBAT:
            return Object.assign({}, state, { inited: true }, action.data);
        case ADD_TURN:
            return Object.assign({}, state, {
                turnCounter: state.turnCounter + 1
            });
    }
    return state;
};
