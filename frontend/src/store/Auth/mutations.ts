import { MutationTree } from 'vuex';
import { UserState, User } from '@/store/types';

const mutations: MutationTree<UserState> = {
  SET_USER: (state, user: User) => {
    state.user = user;
  },
  RESET_USER: (state) => {
    state.user = null;
  },
};

export default mutations;
