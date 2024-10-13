import React, { useState, useEffect, useCallback, createContext } from "react"
import axios from 'axios'
import {
    ReactFlow,
    addEdge,
    useNodesState,
    useEdgesState,
    Background,
    Controls,
} from '@xyflow/react';
//import { useNavigation, useRoute } from "@react-navigation/native";

export const AutomationContext = createContext();

export const AutomationProvider = ({ children }) => {

    const apiURL = import.meta.env.VITE_APP_URL;

    const [name, setName] = useState('');
    const [description, setDescription] = useState('');
    const [trigger, setTrigger] = useState('');
    const [date, setDate] = useState('');
    const [autoId, setAutoId] = useState();
    const [autoData, setAutoData] = useState(null);
    const [collectionData, setCollectionData] = useState([]);
    const [nodes, setNodes, onNodesChange] = useNodesState([]);
    const [edges, setEdges, onEdgesChange] = useEdgesState([]);

    const createNewAutomation = () => {

        axios.post(`${apiURL}/customer/automation`, {

            name,
            description,
            trigger,
            date,
            nodes: nodes.length > 0 ? JSON.stringify(nodes) : '',
            node_values: collectionData.length > 0 ? JSON.stringify(getUniqueNodes(collectionData)) : '',
            node_edges: edges.length > 0 ? JSON.stringify(edges) : ''

        }).then((res) => {
            if (res.data?.errors) {
                let err = res.data?.errors;
                for (let e in err) {
                    popModal('error', err[e]);
                    return;
                }
            } else {
                popModal('success', res.data?.message);
                setTimeout(() => {
                    window.location.href = '/customer/automation'
                }, 1000);
            }
        });

    }

    const updateAutomation = () => {

        let node_values = collectionData.concat(autoData);

        axios.put(`${apiURL}/customer/automation/${autoId}`, {

            name,
            description,
            trigger,
            date,
            nodes: nodes.length > 0 ? JSON.stringify(nodes) : '',
            node_values: node_values.length > 0 ? JSON.stringify(getUniqueNodes(node_values)) : '',
            node_edges: edges.length > 0 ? JSON.stringify(edges) : ''

        }).then((res) => {
            if (res.data?.errors) {
                let err = res.data?.errors;
                for (let e in err) {
                    popModal('error', err[e]);
                    return;
                }
            } else {
                popModal('success', res.data?.message);
                setTimeout(() => {
                    window.location.href = '/customer/automation'
                }, 1000);
            }
        });
    }

    const getUniqueNodes = (nodes) => {
        const uniqueMap = new Map();

        nodes.forEach(node => {
            const key = `${node.name}|${node.child}|${node.id}`;
            if (!uniqueMap.has(key)) {
            uniqueMap.set(key, node);
            }
        });

        return Array.from(uniqueMap.values());
    }

    const onChangeNode = useCallback((evt) => {

        let element = evt.target;
        while (element && !element.hasAttribute('data-id')) {
            element = element.parentNode;
        }
        let id = element ? element.getAttribute('data-id') : null;

        let currentData = {
            id,
            name: evt.target.name,
            value: evt.target.value,
            child: evt.target.getAttribute('child') ?? ''
        };
       
        setCollectionData(collectionData => [...collectionData, currentData])

    }, []);

    const deleteNode = useCallback((event, node) => {
        let id = event.target.parentNode.parentNode.parentNode.parentNode.previousElementSibling.getAttribute('data-nodeId');
        const confirmDelete = window.confirm('Are you sure you want to delete this node?');
        if (confirmDelete) {
            setNodes((nds) => nds.filter((n) => n.id !== id));
            setEdges((eds) => eds.filter((edge) => edge.source !== id && edge.target !== id));
        }
    }, [setNodes, setEdges]);

    const getAutoData = (id) => {
        axios.get(`${apiURL}/customer/automation/get-workflow/${id}`).then((res) => {

            let d = res.data.automation;

            setName(d?.name);
            setDescription(d?.description);
            setTrigger(d?.trigger);
            setDate(d?.date);
            d?.nodes &&
                setNodes(JSON.parse(d.nodes));
            d?.node_edges &&
                setEdges(JSON.parse(d.node_edges));
            if (d?.node_values) {
                setAutoData(JSON.parse(d?.node_values));
                // setCollectionData(d?.node_values)
            }

        });
    }

    const onEditChangeData = (e) => {

        const { name, value } = e.target;
        if (e.target.getAttribute('child')) {

            let c = e.target.getAttribute('child');

            setAutoData(prevData =>
                prevData.map(d =>
                    d.child === c ? { ...d, value } : d
                )
            );

        } else {
            setAutoData(prevData =>
                prevData.map(d =>
                    d.name === name ? { ...d, value } : d
                )
            );
        }
    };

    useEffect(() => {
        let url = window.location.href;
        url = url.split('/');
        if (url.includes('edit')) {
            let aid = url[url.length - 2];
            setAutoId(aid);
            getAutoData(aid);
        }

    }, [])

    function findAttributeInChildren(element, nodeName, childNode, val) {

        if (element.hasAttribute('child') && element.getAttribute('child') == childNode) {
            return element.value = val;
        }

        if (element.hasAttribute('name') && nodeName == element.getAttribute('name')) {
            return element.value = val;
        }

        for (let child of element.children) {

            const result = findAttributeInChildren(child, nodeName, childNode, val);
            if (result) {
                return result;
            }
        }
        return null;
    }

    useEffect(() => {
        if (autoData) {
            let rnodes = document.querySelectorAll('.react-flow__node');
            rnodes.forEach((n, i) => {
                let data_id = n.getAttribute('data-id');
                let its_values = autoData.filter((d) => d.id == data_id);
                its_values?.forEach((iv, j) => {
                    let nm = findAttributeInChildren(n, iv.name, iv.child, iv.value);
                    // console.log(nm);

                });
            });
        }
      
    }, [autoData])

    return (
        <AutomationContext.Provider value={{
            createNewAutomation,
            updateAutomation,
            onEditChangeData,
            onChangeNode,
            nodes,
            setNodes,
            onNodesChange,
            edges,
            setEdges,
            onEdgesChange,
            deleteNode,
            name,
            description,
            trigger,
            date,
            setName,
            setDescription,
            setTrigger,
            setDate,
            autoId,
            autoData,
            setAutoData,
        }}>
            {children}
        </AutomationContext.Provider>
    )

}