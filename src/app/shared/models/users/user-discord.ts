import { Role } from './role';

export interface User {
  id: number;
  email: string;
  password: string;

  role: Role[];

  nickname: string;
  firstName: string;
  middleName: string;
  lastName: string;

  studentNumber: string;
  discordUsername: string;
}
