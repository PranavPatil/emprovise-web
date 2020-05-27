// We need this for the Stack class.
// http://www.dgp.toronto.edu/~ajr/270/a2/soln/
// http://tldp.org/HOWTO/Program-Library-HOWTO/shared-libraries.html
// http://sourceware.org/ml/binutils/2005-01/msg00303.html
// http://www.xmission.com/~georgeps/documentation/tutorials/compilation_and_makefiles.html
// http://www.eyrie.org/~eagle/notes/rpath.html
// http://www.ehuss.net/shared/
//Wilma Fernandez
//Bonnie Phillips
// http://rs648.rapidshare.com/files/314599153/Aho_-_Compilers_-_Principles__Techniques__and_Tools_2e.rar
// careerbuilder.com
// http://www.phpf1.com/tutorial/php-redirect.html
import java.util.*;

class ExprTreeNode {
    
    ExprTreeNode left, right;   // The usual pointers.
    boolean isLeaf;             // Is this a leaf?
    int value;                  // If so, we'll store the number here.
    char op;                    // If not, we need to know which operator.

}


class ExpressionTree {

    ExprTreeNode root;
    

    public void parseExpression (String expr)
    {
        root = parse (expr);
    }
    

    ExprTreeNode parse (String expr)
    {
        ExprTreeNode node = new ExprTreeNode ();
        
	// Note: expr.charAt(0) is a left paren. 
        // First, find the matching right paren.
        int m = findMatchingRightParen (expr, 1);
        String leftExpr = expr.substring (1, m+1);

        // Bottom-out condition:
        if (m == expr.length()-1) {
            // It's at the other end => this is a leaf.
            String operandStr = expr.substring (1, expr.length()-1);
            node.isLeaf = true;
            node.value = getValue (operandStr);
            return node;
        }
        
        // Otherwise, there's a second operand and an operator.

	// Find the left paren to match the rightmost right paren.
        int n = findMatchingLeftParen (expr, expr.length()-2);
        String rightExpr = expr.substring (n, expr.length()-1);

	// Recursively parse the left and right substrings.
        node.left = parse (leftExpr);
        node.right = parse (rightExpr);
        node.op = expr.charAt (m+1);

        return node;
    }
    

    int findMatchingRightParen (String s, int leftPos)
    {
        Stack<Character> stack = new Stack<Character>();
        stack.push (s.charAt(leftPos));
        for (int i=leftPos+1; i<s.length(); i++) {
            char ch = s.charAt (i);
            if (ch == '(') {
                stack.push (ch);
            }
            else if (ch == ')') {
                stack.pop ();
                if ( stack.isEmpty() ) {
                    // This is the one.
                    return i;
                }
            }
        }
        // If we reach here, there's an error.
        System.out.println ("ERROR: findRight: s=" + s + " left=" + leftPos);
        return -1;
    }


    int findMatchingLeftParen (String s, int rightPos)
    {
        Stack<Character> stack = new Stack<Character>();
        stack.push (s.charAt(rightPos));
        for (int i=rightPos-1; i>=0; i--) {
            char ch = s.charAt (i);
            if (ch == ')') {
                stack.push (ch);
            }
            else if (ch == '(') {
                stack.pop ();
                if ( stack.isEmpty() ) {
                    // This is the one.
                    return i;
                }
            }
        }
        // If we reach here, there's an error.
        System.out.println ("ERROR: findLeft: s=" + s + " right=" + rightPos);
        return -1;
    }

    int getValue (String s)
    {
        try {
            int k = Integer.parseInt (s);
            return k;
        }
        catch (NumberFormatException e) {
            return -1;
        }
        
    }


    public int computeValue ()
    {
        return compute (root);
    }
    
    int compute (ExprTreeNode node)
    {
        if (node.isLeaf) {
            return node.value;
        }

        // Otherwise do left and right, and add.
        int leftValue = compute (node.left);
        int rightValue = compute (node.right);

        if (node.op == '+') {
            return leftValue + rightValue;
        }
        else if (node.op == '-') {
            return leftValue - rightValue;
        }
        else if (node.op == '*') {
            return leftValue * rightValue;
        }
        else {
            return leftValue / rightValue;
        }

    }
    

    public String convertToPostfix ()
    {
        String str = postOrder (root);
        return str;
    }
    
    String postOrder (ExprTreeNode node)
    {
        String result = "";
        if (node.left != null) {
            result += postOrder (node.left);
        }
        if (node.right != null) {
            result += " " + postOrder (node.right);
        }
        if (node.isLeaf) {
            result += " " + node.value;
        }
        else {
            result += " " + node.op;
        }
        return result;
    }
    
    
}


class PostfixEvaluator {

    public int compute (String postfixExpr)
    {
	// Create a stack: all our operands are integers.
        Stack<Integer> stack = new Stack<Integer>();

	// Use the Scanner class to help us extract numbers or operators:
        Scanner scanner = new Scanner (postfixExpr);

        while (scanner.hasNext()) {

            if (scanner.hasNextInt()) {
		// It's an operand => push it on the stack.
                int N = scanner.nextInt();
                stack.push (N);
            }
            else {
                // It's an operator => apply the operator to the top two operands
                String opStr = scanner.next();
                int b = stack.pop(); // Note: b is popped first.
                int a = stack.pop();
                if (opStr.equals("+")) {
                    stack.push (a+b);
                }
                else if (opStr.equals("-")) {
                    stack.push (a-b);
                }
                else if (opStr.equals("*")) {
                    stack.push (a*b);
                }
                else if (opStr.equals("/")) {
                    stack.push (a/b);
                }
            }

        } // end-while
        
        // Result is on top.
        return stack.pop();
    }

}



public class ExpressionParser {

    public static void main (String[] argv)
    {
        String s = "((1)+(2))";
        test (s);

        s = "(((1)+(2))*(3))";
        test (s);

        s = "(((35)-((3)*((3)+(2))))/(4))";
        test (s);
    }
    

    static void test (String s)
    {
        ExpressionTree expTree = new ExpressionTree ();
        expTree.parseExpression (s);
        int v = expTree.computeValue ();
        System.out.println (s + " = " + v);
        String postStr = expTree.convertToPostfix ();
        PostfixEvaluator postfixEval = new PostfixEvaluator();
        int p = postfixEval.compute (postStr);
        System.out.println ("Postfix: " + postStr + "    postfix eval=" + p);
    }
    

}
