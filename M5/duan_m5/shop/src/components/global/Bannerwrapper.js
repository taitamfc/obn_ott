import React from 'react';

function Bannerwrapper(props) {
    const { pageTitle, pageSubTitle } = props
    return (
        <>
            <div className="banner-wrapper has_background">
                <img
                    src="assets/images/banner-for-all2.jpg"
                    className="img-responsive attachment-1920x447 size-1920x447"
                    alt="img"
                />

                <div className="banner-wrapper-inner">
                    <h1 className="page-title">{pageTitle}</h1>
                    <div
                        role="navigation"
                        aria-label="Breadcrumbs"
                        className="breadcrumb-trail breadcrumbs"
                    >
                        <ul className="trail-items breadcrumb">
                            <li className="trail-item trail-begin">
                                <a href="/">
                                    <span>{pageTitle}</span>
                                </a>
                            </li>
                            <li className="trail-item trail-end active">
                                <span>{pageSubTitle}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </>
    );
}

export default Bannerwrapper;