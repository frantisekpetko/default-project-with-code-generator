import { TaskStatus } from './task-status.enum';
import { CreateTaskDto } from './dto/create-task.dto';
import { Task } from '../entity/task.entity';
import { EntityRepository, Repository } from "typeorm";
import { GetTasksFilterDto } from './dto/get-tasks-filter.dto';
import { User } from '../entity/user.entity';
import { InternalServerErrorException, Logger } from '@nestjs/common';

@EntityRepository(Task)
export class TaskRepository extends Repository<Task> {
    private logger = new Logger('TaskRepository');

    async getTasks(
        filterDto: GetTasksFilterDto,
        user: User
    ): Promise<Task[]>{
        const { status, search} = filterDto;
        const query = this.createQueryBuilder('task');
        query.where('task.userId = :userId', { userId: user.id });
        if (status) {
            query.andWhere('task.status = :status', {status: 'OPEN'} );
        }

        if (search) {
            query.andWhere('task.title LIKE :search OR task.description LIKE :search', {search: `%${search}%`} );
        }
        try {
            const tasks = await query.getMany();
            return tasks;
        }
        catch (error) {
            this.logger.error(`Failed to get tasks for user "${user.username}", Filters: ${JSON.stringify(filterDto)} `, error.stack);
            throw new InternalServerErrorException();
        }
       
    }

    async createNewTask(
        createTaskDto: CreateTaskDto,
        user: User
    ): Promise<Task>{
        const {title, description } = createTaskDto;
        const task = new Task();
        task.title = title;
        task.description = description;
        task.status = TaskStatus.OPEN;
        task.user = user;

        try
        {
            await task.save();
        }
        catch (e)
        {
            this.logger.error(`Failed to create a task for user "${user.username}, Data: ${createTaskDto}"`);
            throw new InternalServerErrorException();
        }
 
        delete task.user;

        return task;
        
    }

}