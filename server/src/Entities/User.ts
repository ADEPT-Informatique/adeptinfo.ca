import { Column, Entity, JoinTable, ManyToMany, OneToMany, PrimaryColumn } from "typeorm";
import { Role } from "./Role";




@Entity()
export class User {

    @PrimaryColumn()
    userID: string;
    @Column()
    name: string;
    @Column()
    lastName: string;
    @Column()
    email: string;
    @Column()
    password: string;
    @Column()
    studentID: number;
    @Column()
    discordID: string;

    @ManyToMany(() => Role)
    @JoinTable()
    roles: Role[]

}
