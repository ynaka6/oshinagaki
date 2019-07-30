import { ActionTree } from 'vuex';
import axios from 'axios';
import { UserState, RootState, User, LoginState } from '@/store/types';

const actions: ActionTree<UserState, RootState> = {
  currentUser: async ({ commit }) => {
    const response = await axios.get('/api/user');
    const user = response.data || null;
    commit('SET_USER', user);
  },
  login: async ({ commit }, login: LoginState) => {
    return axios.post('/api/login', login)
      .then(response => {
        const user = response.data || null;
        commit('SET_USER', user);
      })
    ;
  },
  setUser: async ({ commit }, user: User) => {
    commit('SET_USER', user);
  },
  resetUser: async ({ commit }) => {
    commit('RESET_USER');
  },
};

export default actions;
