import React, { useState, useCallback, useContext } from 'react';
import {
  ReactFlow,
  addEdge,
  Background,
  Controls,
} from '@xyflow/react';

import '@xyflow/react/dist/style.css';
import { AutomationContext } from './context';

function Automation({ nodeTypes }) {

  const { nodes, setNodes, onNodesChange, edges, setEdges, onEdgesChange } = useContext(AutomationContext);
  const onConnect = useCallback(
    (params) => setEdges((eds) => addEdge(params, eds)),
    [setEdges]
  );

  const onDrop = useCallback(
    (event) => {
      event.preventDefault();
      const type = event.dataTransfer.getData('application/reactflow');
      const position = { x: event.clientX, y: event.clientY };
      const newNode = {
        id: `${nodes.length + 1}`,
        type: type,
        position,
        data: { label: `${type}` },
      };
      setNodes((nds) => nds.concat(newNode));
    },
    [nodes, setNodes]
  );

  const onDragOver = useCallback((event) => {
    event.preventDefault();
    event.dataTransfer.dropEffect = 'move';
  }, []);

  return (
    <div className="col-sm-8" style={{ display: 'flex', height: 500 }}>
      <div
        className="reactflow-wrapper"
        style={{ flex: 1, position: 'relative', background: 'honeydew' }}
        onDrop={onDrop}
        onDragOver={onDragOver}
      >
        <ReactFlow
          minZoom={0.3}
          maxZoom={0.7}
          nodes={nodes}
          edges={edges}
          onNodesChange={onNodesChange}
          onEdgesChange={onEdgesChange}
          onConnect={onConnect}
          fitView
          nodeTypes={nodeTypes}
        >
          <Background />
          <Controls />
        </ReactFlow>
      </div>
    </div>
  );
}

export default Automation;
