import React, { useState } from 'react';
import { DragDropContext, Droppable, Draggable } from 'react-beautiful-dnd';

const DragAndDrop = ({ users, jobs }) => {
    const [assignedJobs, setAssignedJobs] = useState(jobs);

    const onDragEnd = (result) => {
        if (!result.destination) {
            return;
        }

        const items = Array.from(assignedJobs);
        const [reorderedItem] = items.splice(result.source.index, 1);
        items.splice(result.destination.index, 0, reorderedItem);

        setAssignedJobs(items);
    };

    return (
        <DragDropContext onDragEnd={onDragEnd}>
            <Droppable droppableId="users">
                {(provided) => (
                    <div {...provided.droppableProps} ref={provided.innerRef}>
                        {users.map((user, index) => (
                            <Draggable key={user.id} draggableId={user.id} index={index}>
                                {(provided) => (
                                    <div ref={provided.innerRef} {...provided.draggableProps} {...provided.dragHandleProps}>
                                        <div className="card">
                                            <div className="card__title">
                                                <h4>{user.name}</h4>
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </Draggable>
                        ))}
                        {provided.placeholder}
                    </div>
                )}
            </Droppable>
            <Droppable droppableId="jobs">
                {(provided) => (
                    <div {...provided.droppableProps} ref={provided.innerRef}>
                        {assignedJobs.map((job, index) => (
                            <Draggable key={job.id} draggableId={job.id} index={index}>
                                {(provided) => (
                                    <div ref={provided.innerRef} {...provided.draggableProps} {...provided.dragHandleProps}>
                                        <div className="card">
                                            <div className="card__title">
                                                <h4>{job.title}</h4>
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </Draggable>
                        ))}
                        {provided.placeholder}
                    </div>
                )}
            </Droppable>
        </DragDropContext>
    );
};

export default DragAndDrop;
