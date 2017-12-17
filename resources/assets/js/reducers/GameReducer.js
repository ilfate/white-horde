
export const LOADING = 'Game/LOADING';
export const LOADED = 'Game/LOADED';

const initialState = {
    loading: false,
};

export const GameReducer = (state = initialState, action) => {
    switch (action.type) {
        case LOADING:
            return Object.assign({}, state, { loading: true });
        case LOADED:
            return Object.assign({}, state, { loading: false });
    }
    return state;
};
