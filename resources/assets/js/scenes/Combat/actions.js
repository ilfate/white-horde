import { INIT_COMBAT } from '../../reducers/CombatReducer';

export function action1()
{
    const tribe = BACKEND_TRIBE;

    return {
        type: SAVE_TRIBE,
        data: tribe
    }
}
export function init(data)
{
    return {
        type: INIT_COMBAT,
        data
    }
}



