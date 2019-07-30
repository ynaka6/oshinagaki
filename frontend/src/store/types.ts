export interface RootState {
    version: string;
}

export interface LoginState {
    email: string;
    password: string;
}

export interface UserState {
    user: User | null;
}
export interface User {
    id: string;
    email: string;
}
