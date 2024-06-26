import { getRoot } from './javascript.js';

const API_BASE_URL = getRoot();

const handleResponse = async (response) => {
    if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Something went wrong');
    }
    return response.json();
};

const fetchWrapper = {
    get: async (url) => {
        const response = await fetch(`${API_BASE_URL}${url}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                // Adicione outros cabeçalhos necessários
            },
        });
        return handleResponse(response);
    },
    post: async (url, body) => {
        const response = await fetch(`${API_BASE_URL}${url}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // Adicione outros cabeçalhos necessários
            },
            body: JSON.stringify(body),
        });
        return handleResponse(response);
    },
    // Outros métodos (put, delete, etc.) podem ser adicionados aqui
};

export default fetchWrapper;
