import { combineReducers } from 'redux';

// import { reducer as dataReducer } from './data/reducer';

export const UPDATE_TRIBE = 'Tribe/UPDATE_TRIBE';

const initialState = {
    name: null,
    data: null,
    id: null,
    year: null
};

const tribe = (state = initialState, action) => {
    console.log('Reducer action:', action);
    switch (action.type) {
        case UPDATE_TRIBE:

            return Object.assign({}, state, {
                name: action.data.name,
                data:action.data.data,
                id: action.data.id,
                year: action.data.year
            });
    }
    return state;
};

export const TribeReducer = combineReducers({
    // data:        dataReducer,
    tribe,
});