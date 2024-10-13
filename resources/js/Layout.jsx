import React,{useCallback, useContext } from 'react';
import Sidebar from './Sidebar';
import Automation from './Automation';

import TextNode from './nodes/text.jsx';
import ImageNode from './nodes/image.jsx';
import VideoNode from './nodes/video.jsx';
import EmbedNode from './nodes/embed.jsx';

import ITextNode from './nodes/input-text.jsx';
import NumberNode from './nodes/number.jsx';
import EmailNode from './nodes/email.jsx';
import WebsiteNode from './nodes/website.jsx';
import DateNode from './nodes/date.jsx';
import PhoneNode from './nodes/phone.jsx';
import ButtonNode from './nodes/button.jsx';
import { AutomationContext } from './context.jsx';


const Layout = () => {

    const { createNewAutomation, updateAutomation ,autoId, name, description,trigger,date, setName, setDescription, setTrigger, setDate } = useContext(AutomationContext);

    const nodeTypes = {
        TextNode,
        ImageNode,
        VideoNode,
        EmbedNode,
        ITextNode,
        NumberNode,
        EmailNode,
        WebsiteNode,
        DateNode,
        PhoneNode,
        ButtonNode

    };

    return (
        <div style={styles.layout}>
            <div className="container-fluid automations">
                <div className="cardx">
                    <div className="card-bodyx">
                        <div className="d-flex justify-content-between mt-3">
                            <div>
                                <h3 className="text-dark">{ !autoId ? 'Create New' : 'Edit'} Automation</h3>
                            </div>
                            <div>
                                {
                                 !autoId && <button onClick={()=>createNewAutomation()} className="btn btn-primary m-2">Save</button>
                                }
                                  {
                                  autoId && <button onClick={()=>updateAutomation()} className="btn btn-primary m-2">Update</button>
                                }
                                <a href="/customer/automation" className="btn btn-dark">Back</a>
                            </div>
                        </div>
                        <div style={styles.bgLightBlue}>
                            <div className="row mb-3 mt-2">
                                <div className="col-sm-3">
                                    <input type="text" value={name} onChange={(e)=>setName(e.target.value)} className="form-control form-lg" placeholder="Name" />
                                </div>
                                <div className="col-sm-3">
                                    <input type="text" value={description} onChange={(e)=>setDescription(e.target.value)} className="form-control form-lg" placeholder="Description" />
                                </div>
                                <div className="col-sm-3">
                                    <select name="" id="" value={trigger} onChange={(e)=>setTrigger(e.target.value)} className="form-control form-lg">
                                        <option value="">Trigger type</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                                <div className="col-sm-3">
                                    <input type="date" value={date} onChange={(e)=>setDate(e.target.value)} className="form-control form-lg" placeholder="Phrase / Date" />
                                </div>
                            </div>
                            <div className="row">
                                <Sidebar />
                                <Automation nodeTypes={nodeTypes} />
                                <div className="col-sm-12">
                                    <div className="dropArea" style={styles.saveButton}></div>
                                    <div className="mt-3 text-center mb-2">
                                        { !autoId && <button type="submit" className="btn btn-primary" onClick={()=>createNewAutomation()} >Save</button>}
                                        { autoId && <button type="submit" className="btn btn-primary" onClick={()=>updateAutomation()} >Update</button>  }
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

const styles = {
    layout: {
        width: '100%',
        height: '100%'
    },
    bgLightBlue: {
        background: '#F8F9FC',
        marginTop: '10px',
        padding: '10px',
    },
};

export default Layout;
