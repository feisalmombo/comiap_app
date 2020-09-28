import { apiMiddleware } from "./core/apiMiddleware";
import { covid19ContactlessTestMiddleware } from "./components/covid-19-contactless-test-middleware";

export const middleWare = [
    apiMiddleware,
    
    //components
    covid19ContactlessTestMiddleware,
]