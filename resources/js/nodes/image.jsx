import { useCallback,useContext } from 'react';
import { Handle, Position } from '@xyflow/react';
import { AutomationContext } from '../context';

export default function ImageNode({ data }) {
    const { deleteNode,onChangeNode,autoData,onEditChangeData } = useContext(AutomationContext);
    let val = autoData?.find(d => d.child === 'linkImage')?.value;
    return (
        <>
            <Handle type="target" position={Position.Top} id="a" />

            <div className="wd-aside">
                <div className="card">
                    <h5 className="card-header bg-light">Image block
                    <button
                            className="btn btn-sm btn-rounded btn-outline-danger float-end">
                            <i className="uil-trash-alt" onClick={(e) =>deleteNode(e)} ></i>
                     </button>
                    </h5>
                    <div className="card-body">
                        <ul className="nav nav-tabs nav-bordered mb-3">
                            <li className="nav-item">
                                <a href="#linkImage" data-bs-toggle="tab" aria-expanded="true" className="nav-link active">
                                    <span>Link</span>
                                </a>
                            </li>
                            <li className="nav-item">
                                <a href="#uploadImage" data-bs-toggle="tab" aria-expanded="false" className="nav-link">
                                    <span>Upload</span>
                                </a>
                            </li>
                        </ul>
                        <div className="tab-content">
                            <div className="tab-pane show active" id="linkImage">
                                <input type="text" name="ImageNode" child="linkImage"   onBlur={(e)=>onChangeNode(e)} className="form-control form-lg" placeholder="Paste the image link"/>
                            </div>
                            <div className="tab-pane" id="uploadImage">
                                <input type="file" id="imageUpload" name="ImageNode"  child="uploadImage" onBlur={(e)=>onChangeNode(e)}  accept="image/*"/>
                                    <div id="imagePreview"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <Handle type="source" position={Position.Bottom} id="b" />

        </>
    );
}