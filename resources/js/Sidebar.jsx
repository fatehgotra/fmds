import React from 'react';

const Sidebar = ({ onAddNode }) => {
    const allowDrop = (event) => {
        event.preventDefault();
    };

    const onDragStart = (event, nodeType) => {
        event.dataTransfer.setData('application/reactflow', nodeType);
        event.dataTransfer.effectAllowed = 'move';
    };

    const bubles = [
        { node: 'TextNode',  label: 'Text',  ico: 'fa-regular fa-message' },
        { node: 'ImageNode', label: 'Image', ico: 'fa-regular fa-image' },
        { node: 'VideoNode', label: 'Video', ico: 'fa-brands fa-youtube' },
        { node: 'EmbedNode', label: 'Embed', ico: 'fa-solid fa-border-all' },
    ];

    const inputs = [
        { node: 'ITextNode',  label: 'Text',   ico: 'fa-solid fa-font' },
        { node: 'NumberNode', label: 'Number', ico: 'fa-solid fa-hashtag' },
        { node: 'EmailNode',  label: 'Email',  ico: 'fa-solid fa-at' },
        { node: 'WebsiteNode',label: 'Website',ico: 'fa-solid fa-globe' },
        { node: 'DateNode',   label: 'Date',   ico: 'fa-solid fa-calendar-days' },
        { node: 'PhoneNode',  label: 'Phone',  ico: 'fa-solid fa-phone' },
        { node: 'ButtonNode', label: 'Button', ico: 'fa-regular fa-circle-check' },
    ];

    return (
        <div className="col-sm-4">
            <div style={styles.sideWidget}>
                <div>
                    <div className="mb-2">
                        <h5 style={{ marginLeft: "5px", fontWeight: 600 }}>Bubbles</h5>
                        <div className="row">
                            {
                                bubles?.map((b, i) => {

                                    return (
                                        <div className="col-sm-6" key={i}>
                                            <div
                                                id={`item` + i}
                                                style={styles.items}
                                            >
                                                <span className="wd-title" style={styles.wdTitle}>
                                                    <i className={b.ico}></i>
                                                    <SidebarItem type={b.node} label={b.label} onDragStart={onDragStart} />
                                                </span>

                                            </div>
                                        </div>
                                    );
                                })
                            }
                        </div>
                    </div>
                    <div className="mb-2">
                        <h5 style={{ marginLeft: "5px", fontWeight: 600 }}>Inputs</h5>
                        <div className="row">

                            {
                                inputs?.map((b, i) => {

                                    return (
                                        <div className="col-sm-6" key={i}>
                                            <div
                                                id={`item` + i}
                                                style={styles.items}
                                            >
                                                <span className="wd-title" style={styles.wdTitle}>
                                                    <i className={b.ico}></i>
                                                    <SidebarItem type={b.node} label={b.label} onDragStart={onDragStart} />
                                                </span>

                                            </div>
                                        </div>
                                    );
                                })
                            }

                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

const SidebarItem = ({ type, label, onDragStart }) => (
    <div
        className="sidebar-item"
        onDragStart={(event) => onDragStart(event, type)}
        draggable
    >
        {label}
    </div>
);

const styles = {
    bgLightBlue: {
        background: '#F8F9FC',
        marginTop: '10px',
        padding: '10px',
    },
    dropArea: {
        aspectRatio: '1/0.5',
    },
    sideWidget: {
        background: '#fff',
        height: '500px',
        padding: '8px',
        boxShadow: 'rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px',
        borderRadius: '6px',
    },
    items: {
        padding: '10px',
        backgroundColor: '#F8F9FC',
        color: '#111',
        marginBottom: '10px',
        borderRadius: '6px',
        textAlign: 'center',
        cursor: 'pointer',
    },
    wdTitle: {
        display: 'flex',
    },
    wdAside: {
        display: 'none',
    },
    cardHeader: {
        borderTopLeftRadius: '20px',
        borderTopRightRadius: '20px',
    },
    orcolor: {
        color: '#dc8938',
        fontSize: '18px',
        marginRight: '4px',
    },
    imagePreview: {
        maxWidth: '100%',
        maxHeight: '400px',
        border: '1px solid #ccc',
        marginTop: '10px',
    },
};

export default Sidebar;
