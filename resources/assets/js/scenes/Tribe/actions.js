import { SAVE_TRIBE } from 'reducers/TribeReducer';

export function usePreloadedTribe()
{
    const tribe = BACKEND_TRIBE;

    return {
        type: SAVE_TRIBE,
        data: tribe
    }
}



