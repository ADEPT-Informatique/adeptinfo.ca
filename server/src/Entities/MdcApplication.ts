import { Column, Entity, JoinColumn, OneToOne, PrimaryGeneratedColumn } from "typeorm";
import { User } from "./User";



@Entity()
export class MdcApplication {

    @PrimaryGeneratedColumn()
    applicationID: number

    @OneToOne(() => User)
    @JoinColumn()
    user: User;
    @Column()
    infoSessions: number;
    @Column()
    why: string;
    @Column()
    tvClimbing: string;
    @Column()
    binaryPizza: string;
    @Column()
    math: string;
    @Column()
    JvsJS: number;
    @Column()
    gif: string;
    @Column()
    meme: string;
    @Column()
    banned: string;
    @Column()
    popularDrink: string;
    @Column()
    roomNumber: string;
    @Column()
    limited: boolean;

}
