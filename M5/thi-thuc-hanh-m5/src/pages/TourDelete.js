import React, { useEffect, useState } from 'react';
import { Link, useNavigate, useParams } from 'react-router-dom';
import TourModel from '../models/TourModel';
import Swal from 'sweetalert2'; // Import SweetAlert2
import 'sweetalert2/dist/sweetalert2.min.css';

function TourDelete(props) {
    const navigate = useNavigate();
    const { id } = useParams();
    const [tour, setTour] = useState({});

    useEffect(() => {
        TourModel.find(id)
            .then((res) => {
                setTour(res);
            })
            .catch(err => {
                console.error(err);
            });
    }, [id]);

    const handleDelete = () => {
        // Use SweetAlert2 for confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this tour!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then(result => {
            if (result.isConfirmed) {
                TourModel.delete(id)
                    .then((res) => {
                        Swal.fire('Deleted!', 'The tour has been deleted.', 'success');
                        navigate('/tours');
                    })
                    .catch(err => {
                        console.error(err);
                    });
            }
        });
    };

    return (
        <div className="container">
            <h1>TourDelete</h1>
            <p>Are you sure you want to delete the following tour?</p>
            <div>
                <strong>ID:</strong> {tour.id}<br />
                <strong>Name:</strong> {tour.name}<br />
                <strong>Price:</strong> {tour.price}<br />
                <strong>Description:</strong> {tour.description}<br />
            </div>
            <button className="delete-btn" onClick={handleDelete}>Delete</button>
            <Link to="/tours" className="back-btn">Back</Link>
        </div>
    );
}

export default TourDelete;
