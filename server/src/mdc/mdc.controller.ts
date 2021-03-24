import { Controller, Get } from '@nestjs/common';
import { MembreConfianceService } from './membre-confiance.service';

@Controller('mdc')
export class MdcController {

    constructor(private readonly mdcService: MembreConfianceService) { }

    @Get()
    getAll(): string {
        return this.mdcService.getAll();
    }
}
