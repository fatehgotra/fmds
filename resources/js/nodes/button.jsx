import { useCallback,useContext,useRef } from 'react';
import { Handle, Position } from '@xyflow/react';
import { AutomationContext } from '../context';

export default function ButtonNode({ data }) {

    const { deleteNode,onChangeNode,autoData,onEditChangeData } = useContext(AutomationContext);
    let val1 = autoData?.find(d => d.child === 'ButtonName')?.value;
    let val2 = autoData?.find(d => d.child === 'ButtonURL')?.value;

    return (
        <>
            <Handle type="target" position={Position.Top} id="a" />

            <div className="wd-aside">
                <div className="card">
                    <h5 className="card-header bg-light">Buttons Block
                    <button
                            className="btn btn-sm btn-rounded btn-outline-danger float-end">
                            <i className="uil-trash-alt" onClick={(e) =>deleteNode(e)} ></i>
                     </button>
                    </h5>
                    <div className="card-body">
                        <div className="form-group mb-2">
                            <label className="form-label">Button name</label>
                            <input type="text"  name="ButtonNode" child="ButtonName" onBlur={(e)=>onChangeNode(e)} className="form-control" placeholder="Enter button name.."/>
                        </div>
                        <div className="form-group mb-2">
                            <label className="form-label">Button URL</label>
                            <input type="text"  name="ButtonNode" child="ButtonURL" onBlur={(e)=>onChangeNode(e)} className="form-control" placeholder="Enter button URL.."/>
                        </div>
                    </div>
                </div>
            </div>

            <Handle type="source" position={Position.Bottom} id="b" />

        </>
    );
}