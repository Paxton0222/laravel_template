export interface AutoIncrement {
    id: number | undefined
}

export interface Timestamps {
    created_at: string | null
    updated_at: string | null
}

export interface UserFillable {
    name: string
    email: string
    password: string
}

export interface UserColumns extends Timestamps {
    email_verified_at: string | null
}

export type User = Partial<AutoIncrement> &
    Partial<UserFillable> &
    Partial<UserColumns>
