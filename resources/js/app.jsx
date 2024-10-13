import './bootstrap-react';
import React from 'react';
import { createRoot } from 'react-dom/client';
import Layout from './Layout';
import { AutomationProvider } from './context';

const container = document.getElementById('react-root');
const root = createRoot(container);
root.render(
  <>
    <React.StrictMode>
      <AutomationProvider>
      <Layout />
      </AutomationProvider>
    </React.StrictMode>
  </>
);


