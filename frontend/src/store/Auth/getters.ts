import { GetterTree } from 'vuex';
import { UserState, RootState } from '@/store/types';

const getters: GetterTree<UserState, RootState> = {
  user: (state: UserState) => {
    return state.user;
  },
  loggedIn: (state: UserState): boolean => {
    return null !== state.user;
  },
};

export default getters;
