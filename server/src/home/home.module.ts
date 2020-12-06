import { Module } from '@nestjs/common';
import { MdcController } from './mdc/mdc.controller';

@Module({
  controllers: [MdcController]
})
export class HomeModule {}
