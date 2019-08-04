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


export interface Menu {
    id: number | null;
    font_id: number | null;
    wallpaper_id: number | null;
    date: string;
    signature_title: string;
    signature_name: string;
    sections: MenuSection[];
};

export interface MenuSection {
    id: number | null;
    menu_id: number | null;
    title: string;
    items: MenuSectionItem[];
};

export interface MenuSectionItem {
    id: number | null;
    menu_section_id: number | null;
    title: string;
};


export interface ServerErrors {
    [k: string]: String[] | ServerErrors[];
};
