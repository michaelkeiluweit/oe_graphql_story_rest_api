# REST API

## Product
#### One product
`http://rest/api/product?id[]=0584e8b766a4de2177f9ed11d1587f55`

#### Multiple products
`http://rest/api/product?id[]=0584e8b766a4de2177f9ed11d1587f55&id[]=05848170643ab0deb9914566391c0c63`

#### All products
`http://rest/api/product`

If not a single product was found by the given id(s), then a 404 header will be returned.

## Category
#### One category
`http://rest/api/category?id[]=0584e8b766a4de2177f9ed11d1587f55`

#### Multiple categories
`http://rest/api/category?id[]=0584e8b766a4de2177f9ed11d1587f55&id[]=05848170643ab0deb9914566391c0c63`

#### All categories
`http://rest/api/category`

If not a single category was found by the given id(s), then a 404 header will be returned.
  
 
## Categories assigned to a product
`http://rest/api/category2product?id=0584e8b766a4de2177f9ed11d1587f55`


## Products assigned to a category
`http://rest/api/product2category?id=fc7e7bd8403448f00a363f60f44da8f2`
