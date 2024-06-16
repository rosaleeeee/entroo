import React from 'react';
import ReactDOM from 'react-dom';
import DragAndDrop from '../../resources/js/components/DragAndDrop';

const users = [
    { id: '1', name: 'Nawali Salma' },
    { id: '2', name: 'Mehdaoui Mariam' },
    { id: '3', name: 'Housam Abdellatif' },
    { id: '4', name: 'Khalil Amin' },
    { id: '5', name: 'Zouhir Rania' },
    { id: '6', name: 'Bensalem Fares' },
    { id: '7', name: 'Tazi Yassine' },
    { id: '8', name: 'Khalfi Nadia' },
    { id: '9', name: 'Saidi Karim' },
];

const jobs = [
    { id: 'job-1', title: 'Product Manager', assignedUser: null },
    { id: 'job-2', title: 'Sales Manager', assignedUser: null },
    { id: 'job-3', title: 'Accountant', assignedUser: null },
    { id: 'job-4', title: 'Marketing Manager', assignedUser: null },
    { id: 'job-5', title: 'Partnerships Manager', assignedUser: null },
    { id: 'job-6', title: 'Chief Operating Officer (COO)', assignedUser: null },
    { id: 'job-7', title: 'Chief Financial Officer (CFO)', assignedUser: null },
    { id: 'job-8', title: 'Project Manager', assignedUser: null },
    { id: 'job-9', title: 'Customer Service Manager', assignedUser: null },
];

function App() {
    return (
        <div className="container">
            <h1>Drag and Drop Example</h1>
            <DragAndDrop users={users} jobs={jobs} />
        </div>
    );
}

ReactDOM.render(<App />, document.getElementById('app'));
