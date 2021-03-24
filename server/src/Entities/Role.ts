import { Column, Entity, PrimaryGeneratedColumn } from "typeorm";

@Entity()
export class Role {

    @PrimaryGeneratedColumn()
    roleID: number;
    @Column()
    name: string;
    @Column()
    color: string;

}