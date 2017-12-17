import { combineReducers } from 'redux';

// import { reducer as dataReducer } from './data/reducer';

export const SAVE_TRIBE = 'Tribe/SAVE_TRIBE';
export const UPDATE_TRIBE = 'Tribe/UPDATE_TRIBE';

const initialState = BACKEND_TRIBE;

export const TribeReducer = (state = initialState, action) => {
    console.log('Reducer action:', action);
    switch (action.type) {
        case SAVE_TRIBE:
            return Object.assign({}, state, {
                name: action.data.name,
                data:action.data.data,
                id: action.data.id,
                year: action.data.year
            });
        case UPDATE_TRIBE:
            return Object.assign({}, state, action.data);

    }
    return state;
};
