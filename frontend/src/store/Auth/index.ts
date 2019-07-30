import { Module } from 'vuex';
import { UserState, RootState } from '@/store/types';
import getters from './getters';
import actions from './actions';
import mutations from './mutations';

const state: UserState = {
  user: null,
};

export const auth: Module<UserState, RootState> = {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
