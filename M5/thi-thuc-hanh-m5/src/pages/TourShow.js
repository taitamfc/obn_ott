import React, { useEffect, useState } from 'react';
import { useParams, Link } from 'react-router-dom';
import TourModel from '../models/TourModel';

function TourShow(props) {
    const { id } = useParams();
    const [tour, setTour] = useState({});

    useEffect(() => {
        TourModel.find(id)
            .then((res) => {
                setTour(res);
            })
            .catch(err => {
                throw err;
            });
    }, [id]);

    return (
        <div className="container">
            <div className="tour-detail">
                <h1>Tour Detail</h1>
                <div>
                    <strong>Name:</strong> {tour.name}
                </div>
                <div>
                    <strong>Price:</strong> {tour.price}
                </div>
                <div>
                    <strong>Description:</strong> {tour.description}
                </div>
            </div>
            <Link to="/tours">
                <button className="back-button">Danh sách</button>
            </Link>
        </div>
    );
}

export default TourShow;
