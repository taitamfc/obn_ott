import React from 'react';
import LayoutMaster from '../layouts/LayoutMaster';
import Silder from '../components/Home/Silder';
import Section from '../components/Home/Section';
import Akasha from '../components/Home/Akasha';

function Home(props) {
    return (
        <LayoutMaster>
            <>
            <Silder/>
            <Section/>
            </>
        </LayoutMaster>

    );
}

export default Home;