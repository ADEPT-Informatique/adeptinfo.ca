import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm/dist/typeorm.module';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { User } from './Entities/User';
import { Role } from './Entities/Role';
import { MdcApplication } from './Entities/MdcApplication';
import { UserController } from './user/user.controller';
import { MdcController } from './mdc/mdc.controller';
import { HomeController } from './home/home.controller';
import { AdminController } from './admin/admin.controller';
import { UserService } from './user/user.service';
import { MembreConfianceService } from './mdc/membre-confiance.service';
import { HomeService } from './home/home.service';

@Module({
  imports: [
    TypeOrmModule.forRoot({
      type: 'mysql',
      host: 'web.martin',
      port: 3306,
      username: 'user',
      password: 'passw0rd',
      database: 'adept',
      entities: [User, Role, MdcApplication],
      synchronize: true,
    })
  ],
  controllers: [AppController, UserController, MdcController, HomeController, AdminController],
  providers: [AppService, UserService, MembreConfianceService, HomeService],
})
export class AppModule { }
