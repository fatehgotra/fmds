import { useCallback,useContext } from 'react';
import { Handle, Position } from '@xyflow/react';
import { AutomationContext } from '../context';

export default function DateNode({ data }) {
    const { deleteNode,onChangeNode,autoData,onEditChangeData } = useContext(AutomationContext);
    let val = autoData?.find(d => d.name === 'DateNode')?.value;
    return (
        <>
            <Handle type="target" position={Position.Top} id="a" />

            <div className="wd-aside">
                <div className="card">
                    <h5 className="card-header bg-light">Date Block
                    <button
                            className="btn btn-sm btn-rounded btn-outline-danger float-end">
                            <i className="uil-trash-alt" onClick={(e) =>deleteNode(e)} ></i>
                     </button>
                    </h5>
                    <div className="card-body">
                        <input type="date"  name="DateNode" onBlur={(e)=>onChangeNode(e)} className="form-control" placeholder="Pick a date.."/>
                    </div>
                </div>
            </div>

            <Handle type="source" position={Position.Bottom} id="b" />

        </>
    );
}