# Add an "Enquiry" or "Ask a Question" button on the product page in Magento 2

Use this code to add an "Enquiry" or "Ask a Question" button on the product page in Magento 2. When clicked, a popup form will appear, allowing customers to submit their inquiries about the product.

## Implementation Steps:

1. Add query.phtml and popup_form.phtml files in the Magento_Catalog template directory.<br />
2. Update the layout file (catalog_product_view.xml) by adding the following code: <br>
	<container name="product.info.form.content" as="product_info_form_content">
	 	<block class="Magento\Catalog\Block\Product\View" 
           	name="product.info.addtocart" 
           	as="addtocart" 
          	 template="Magento_Catalog::product/view/addtocart.phtml"/>
    		 <block class="Magento\Catalog\Block\Product\View" 
           	name="product.info.productquery" 
           	as="productquery" 
          	 template="Magento_Catalog::product/view/query.phtml"/>
	</container>

	<referenceContainer name="content">
    		<block class="Magento\Catalog\Block\Product\View" 
          	 name="mypopup.form"
          	 template="Magento_Catalog::product/view/popup_form.phtml"/>
	</referenceContainer>

## File Functions:

<strong>query.phtml → </strong>  Adds the "Ask a Question" button to the product page.<br>

<strong>popup_form.phtml → </strong>  Contains the popup form layout and input fields for customer inquiries. <br>

<strong>ajax-productenquiryform → </strong> Add file in the root of Magento. This file handles form submission and sends emails using PHPMailer.

### With this implementation, customers can easily ask product-related questions, improving engagement and customer support.

#### This script has been tested in Magento 2.2, 2.3, and 2.4 versions.