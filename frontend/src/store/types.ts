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

export interface Wallpaper {
    id: number;
    name: string;
    url: string;
}

export interface Font {
    id: number;
    name: string;
    slug: string;
};